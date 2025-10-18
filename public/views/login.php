
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($data['judul']) ? $data['judul'] : 'Login'; ?></title>
    
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/public/css/login.css" /> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  </head>
  <body>
    <div class="background">
      <div class="login">
        <h3>Login Pendaftar</h3>
        
        <form action="<?php echo BASEURL; ?>/login/auth" method="POST" id="loginForm"> 
        
          <input
            type="text"
            name="nama"      
            id="nama"
            placeholder="Nama Lengkap" 
            required
          />
          <input
            type="password"   
            name="password"     
            id="password"
            placeholder="Password"        
            required
          />
          
          <button type="submit">Login</button>
          
        </form>
         <p class="mt-4 text-sm">Belum punya akun? <a href="<?php echo BASEURL; ?>/pendaftar" class="text-purple-400 hover:text-white">Daftar di sini</a></p>
      </div>
    </div>
  </body>
</html>