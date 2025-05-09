<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notificación de desinvitación</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color: #f6f6f6;">
    <span style="display:none; font-size:1px; color:#f6f6f6; line-height:1px; max-height:0px; max-width:0px; opacity:0; overflow:hidden;">Has sido desinvitado de una tarea.</span>
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f6f6f6; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 5px; overflow: hidden;">
                    <tr>
                        <td style="background-color: #d9534f; padding: 20px; text-align: center; color: #ffffff; font-size: 24px; font-weight: bold;">
                            Notificación de desinvitación
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px; color: #333333; font-size: 16px; line-height: 1.5;">
                            <p>Hola,</p>
                            <p>Has sido desinvitado de la tarea “{{ $tarea->nombre }}”.</p>
                            <p style="text-align: center; margin: 40px 0;">
                                <a href="{{ route('tareas.index') }}" style="background-color: #d9534f; color: #ffffff; padding: 12px 25px; text-decoration: none; border-radius: 4px; display: inline-block; font-weight: bold;">Ver mis tareas</a>
                            </p>
                            <p>Lamentamos cualquier inconveniente que esto pueda causar. Si tienes alguna pregunta, no dudes en contactarnos.</p>
                            <p>Saludos cordiales,<br>El equipo de tareas</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0; padding: 15px; text-align: center; font-size: 12px; color: #999999;">
                            &copy; {{ date('Y') }} Tareas App. Todos los derechos reservados.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
