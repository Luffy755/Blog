<?php 

    //add new
    if ($action == 'add') {
      if (!empty($_POST)) {
          // Validate
          $errors = [];
  
          if (empty($_POST['username'])) {
              $errors['username'] = "A username is required";
          } elseif (!preg_match("/^[a-zA-Z]+$/", $_POST['username'])) {
              $errors['username'] = "Username can only have letters and no spaces";
          }
  
          $query = "SELECT id FROM users WHERE email = :email LIMIT 1";
          $email = query($query, ['email' => $_POST['email']]);
  
          if (empty($_POST['email'])) {
              $errors['email'] = "An email is required";
          } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              $errors['email'] = "Email not valid";
          } elseif ($email) {
              $errors['email'] = "That email is already in use";
          }
  
          if (empty($_POST['password'])) {
              $errors['password'] = "A password is required";
          } elseif (strlen($_POST['password']) < 8) {
              $errors['password'] = "Password must be 8 characters or more";
          } elseif ($_POST['password'] !== $_POST['retype_password']) {
              $errors['password'] = "Passwords do not match";
          }
  
          // Validate file upload
          $allowed_types = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
          $destination = '';
  
          if (!empty($_FILES['image']['name'])) {
              $file_type = mime_content_type($_FILES['image']['tmp_name']);
              if (!in_array($file_type, $allowed_types)) {
                  $errors['image'] = "Image format not supported";
              } else {
                  $folder = "uploads/";
                  if (!file_exists($folder)) {
                      mkdir($folder, 0777, true);
                  }
  
                  $destination = $folder . time() . '_' . basename($_FILES['image']['name']);
                  if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                      $errors['image'] = "Error uploading the file";
                  }
              }
          }
  
          if (empty($errors)) {
              // Save to database
              $data = [
                  'username' => $_POST['username'],
                  'email'    => $_POST['email'],
                  'role'     => $_POST['role'],
                  'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
              ];
  
              $query = "INSERT INTO users (username, email, password, role";
              if (!empty($destination)) {
                  $data['image'] = $destination;
                  $query .= ", image";
              }
              $query .= ") VALUES (:username, :email, :password, :role";
              if (!empty($destination)) {
                  $query .= ", :image";
              }
              $query .= ")";
  
              query($query, $data);
              redirect('admin/users');
          }
      }
  
}else
    if ($action == 'edit') {
      $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
      $row = query_row($query, ['id' => $id]);
  
      if (!empty($_POST)) {
          if ($row) {
              // Validate
              $errors = [];
  
              if (empty($_POST['username'])) {
                  $errors['username'] = "A username is required";
              } elseif (!preg_match("/^[a-zA-Z]+$/", $_POST['username'])) {
                  $errors['username'] = "Username can only have letters and no spaces";
              }
  
              $query = "SELECT id FROM users WHERE email = :email AND id != :id LIMIT 1";
              $email = query($query, ['email' => $_POST['email'], 'id' => $id]);
  
              if (empty($_POST['email'])) {
                  $errors['email'] = "An email is required";
              } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                  $errors['email'] = "Email not valid";
              } elseif ($email) {
                  $errors['email'] = "That email is already in use";
              }
  
              if (!empty($_POST['password'])) {
                  if (strlen($_POST['password']) < 8) {
                      $errors['password'] = "Password must be 8 characters or more";
                  } elseif ($_POST['password'] !== $_POST['retype_password']) {
                      $errors['password'] = "Passwords do not match";
                  }
              }
  
              // Validate file upload
              $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
              $destination = '';
  
              if (!empty($_FILES['image']['name'])) {
                  $file_type = mime_content_type($_FILES['image']['tmp_name']);
                  if (!in_array($file_type, $allowed_types)) {
                      $errors['image'] = "Image format not supported";
                  } else {
                      $folder = "uploads/";
                      if (!file_exists($folder)) {
                          mkdir($folder, 0777, true);
                      }
  
                      $destination = $folder . time() . '_' . basename($_FILES['image']['name']);
                      if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                          $errors['image'] = "Error uploading the file";
                      }
                  }
              }
  
              if (empty($errors)) {
                  // Prepare data for update
                  $data = [
                      'username' => $_POST['username'],
                      'email'    => $_POST['email'],
                      'role'     => $_POST['role'],
                      'id'       => $id
                  ];
  
                  $password_str = "";
                  $image_str = "";
  
                  if (!empty($_POST['password'])) {
                      $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                      $password_str = "password = :password, ";
                  }
  
                  if (!empty($destination)) {
                      $image_str = "image = :image, ";
                      $data['image'] = $destination;
                  }
  
                  $query = "UPDATE users SET username = :username, email = :email, $password_str $image_str role = :role WHERE id = :id LIMIT 1";
                  query($query, $data);
                  redirect('admin/users');
              }
          }
      }
  }
  
else
if($action == 'delete')
    {
        
        $query = "select * from users where id = :id limit 1";
        $row = query_row($query, ['id'=>$id]);

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {

          if($row)
          {

            //validate
            $errors = [];
 
            if(empty($errors))
            {
              //delete from database
              $data = [];
              $data['id']       = $id;

              $query = "delete from users where id = :id limit 1";
              query($query, $data);

              if(file_exists($row['image']))
                unlink($row['image']);

              redirect('admin/users');

            }
          }
        }
      }