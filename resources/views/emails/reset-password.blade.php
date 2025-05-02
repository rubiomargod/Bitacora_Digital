<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restablecer Contraseña</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
  <div style="text-align: center; padding: 20px; background-color: #f4f4f4;">
    <h2 style="color: #333;">Restablece tu contraseña</h2>
    <p style="color: #555;">Has solicitado restablecer tu contraseña. Haz clic en el siguiente enlace para proceder:</p>
    <a href="{{ route('password.resetform', ['estatus' => 'ResetForm', 'token' => $token]) }}"
      style="background-color: #007bff; color: white; padding: 12px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 20px;">
      Restablecer Contraseña
    </a>
    <p style="color: #777; margin-top: 20px;">Si no solicitaste el restablecimiento de tu contraseña, ignora este correo.</p>
  </div>
</body>

</html>