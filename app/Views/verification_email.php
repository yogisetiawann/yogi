<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
</head>

<body>
    <h2>Verifikasi Email</h2>
    <p>Silakan klik tautan di bawah ini untuk verifikasi email Anda:</p>
    <p><a href="<?= site_url('register/verify?token=' . $token) ?>">Klik disini untuk verifikasi email Anda</a></p>
    <p>Jika Anda mengklik link verifikasi selama 1 menit lebih, Maka verifikasi Gagal.</p>
    <p>Jika Anda tidak mengirim permintaan verifikasi ini, Anda dapat mengabaikan email ini.</p>
</body>

</html>