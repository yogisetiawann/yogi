<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url() ?>/templates/login-form/style.css" />
  <title>Sign in & Sign up Form</title>
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default/default.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <style>
    .show-password {
      position: relative;
    }

    .show-password input[type="password"] {
      padding-right: 35px;
    }

    .show-password .show-hide {
      position: absolute;
      top: 50%;
      right: 20px;
      transform: translateY(-50%);
      cursor: pointer;
      display: flex;
      /* Menjadikan elemen flex container */
      align-items: center;
      /* Mengatur penempatan vertikal menjadi di tengah */
      justify-content: center;
      /* Mengatur penempatan horizontal menjadi di tengah */
    }

    .show-password .show-hide img {
      width: 18px;
      height: 18px;
    }

    #eyeicon {
      fill: green;
      /* Mengatur warna ikon menjadi hijau */
    }
  </style>
</head>

<body>
  <?php if (session()->getFlashdata('pesan')) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?= session()->getFlashdata('pesan') ?>',

      })
    </script>
  <?php } ?>

  <?php if (session()->getFlashdata('success')) { ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?= session()->getFlashdata('success') ?>',

      })
    </script>
  <?php } ?>

  <?php if (session()->getFlashdata('error')) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?= session()->getFlashdata('error') ?>',

      })
    </script>
  <?php } ?>

  <?php if (session()->getFlashdata('verif')) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?= session()->getFlashdata('verif') ?>',

      })
    </script>
  <?php } ?>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="<?= base_url('/proses_login'); ?>" method="post" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" required />
          </div>
          <div class="input-field show-password">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required />
            <div class="show-hide">
              <img src="<?= base_url() ?>/templates/img/eye-slash-fill.svg" id="eyeicon" style="cursor: pointer;">
            </div>
          </div>
          <input type="submit" value="Login" class="btn solid" />
        </form>

        <form action="<?= base_url('/register/process') ?>" method="post" class="sign-up-form">

          <h2 class="title">Sign Up</h2>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" required />
          </div>
          <div class="input-field show-password">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required />
            <div class="show-hide">
              <img src="<?= base_url() ?>/templates/img/eye-slash-fill.svg" id="eyeicon" style="cursor: pointer;">
            </div>
          </div>
          <div class="input-field show-password">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Konfirmasi Password" name="confirm_password" required />
            <div class="show-hide">
              <img src="<?= base_url() ?>/templates/img/eye-slash-fill.svg" id="confirm-eyeicon" style="cursor: pointer;">
            </div>
          </div>
          <input type="submit" class="btn" value="Sign up" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Belum punya akun?</h3>
          <p>
            Daftar akunmu disini sekarang juga untuk memulai memilah sampah dan dapatkan voucher gratis untuk ditukarkan di BUMdes!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <a href="<?= base_url('/') ?>">
          <img src="<?= base_url() ?>/templates/img/ecory.png" class="image" alt="" />
        </a>


      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Sudah punya akun?</h3>
          <p>
            Mulailah untuk menukarkan sampahmu dengan voucher yang bisa ditukarkan di BUMdes desa situsari!
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <a href="<?= base_url('/') ?>">
          <img src="<?= base_url() ?>/templates/img/ecory.png" class="image" alt="" />
        </a>
      </div>
    </div>
  </div>

  <script src="<?= base_url() ?>/templates/login-form/app.js"></script>

  <script>
    let showPasswordIcons = document.querySelectorAll(".show-password img");
    showPasswordIcons.forEach((icon) => {
      icon.addEventListener("click", function() {
        let inputField = this.parentNode.parentNode.querySelector("input");
        if (inputField.type === "password") {
          inputField.type = "text";
          this.src = "<?= base_url() ?>/templates/img/eye-fill.svg";
        } else {
          inputField.type = "password";
          this.src = "<?= base_url() ?>/templates/img/eye-slash-fill.svg";
        }
      });
    });

    const backButton = document.getElementById("back-btn");
    backButton.addEventListener("click", () => {
      window.location.href = "/";
    });
  </script>

  <script>
    <?php if (session()->getFlashdata('error')) { ?>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?= session()->getFlashdata('error') ?>',
      });
    <?php } ?>
  </script>

</body>

</html>