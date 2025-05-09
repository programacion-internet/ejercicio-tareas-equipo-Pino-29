<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invitación a tarea</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4;">
  <!-- Preheader text (hidden) -->
  <span style="display:none; font-size:0; line-height:0; max-height:0; max-width:0; opacity:0; overflow:hidden;">
    Has sido invitado a la tarea “{{ $tarea->nombre }}”.
  </span>

  <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0"
               style="background-color:#ffffff; margin:40px 0; border-radius:8px; overflow:hidden;">
          
          <!-- Header -->
          <tr>
            <td style="background-color:#38a169; padding:20px; text-align:center; color:#ffffff;
                       font-family:sans-serif; font-size:24px;">
              Invitación a tarea
            </td>
          </tr>
          
          <!-- Body -->
          <tr>
            <td style="padding:30px; font-family:sans-serif; font-size:16px; color:#333333;">
              <p>¡Hola!</p>
              <p>Has sido invitado a la tarea <strong>"{{ $tarea->nombre }}"</strong>.</p>
              <p><strong>Fecha de entrega:</strong> {{ $tarea->fecha_limite->format('d/m/Y H:i') }}</p>
              
              <p style="text-align:center; margin:40px 0;">
                <a href="{{ route('tareas.show', $tarea) }}"
                   style="background-color:#38a169; color:#ffffff; text-decoration:none;
                          padding:12px 24px; border-radius:4px; display:inline-block;
                          font-family:sans-serif; font-size:16px;">
                  Ver detalles
                </a>
              </p>
              
              <p>Gracias por usar nuestra aplicación.</p>
              <p>— El equipo de Mi App</p>
            </td>
          </tr>
          
          <!-- Footer -->
          <tr>
            <td style="padding:10px; text-align:center; font-family:sans-serif;
                       font-size:12px; color:#777777;">
              Si no solicitaste esta invitación, por favor ignóralo.
            </td>
          </tr>
          
        </table>
      </td>
    </tr>
  </table>
</body>
</html>