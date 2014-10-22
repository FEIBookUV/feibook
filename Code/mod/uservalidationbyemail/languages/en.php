<?php
/**
 * Email user validation plugin language pack.
 *
 * @package Elgg.Core.Plugin
 * @subpackage ElggUserValidationByEmail
 */

$english = array(
	'email:validate:subject' => "%s por favor confirme su direcci贸n de correo electr贸nico!",
	'email:validate:body' => "%s,

Antes de que puedas empezar a usar  %s, debes confirmar tu direcci贸n de correo electr贸nico.

Por favor confirme su direcci贸n de correo electr贸nico haciendo clic en el enlace de abajo:

%s

Si usted no puede hacer clic en el enlace, copie y peguelo en su navegador de forma manual.

%s
%s
",

	'email:validate:success:subject' => "Correo validado %s!",
	'email:validate:success:body' => "Hola %s,

Felicidades, usted ha validado con exito su direcci贸n de correo electr贸nico.",


	'email:confirm:success' => "Se ha confirmado su direcci贸n de correo electr贸nico!",
	'email:confirm:fail' => "Su direcci贸n de correo electronico no pudo ser verificada...",

	'uservalidationbyemail:registerok' => "Para activar su cuenta, por favor confirme su direccion de correo electronico haciendo clic en el enlace que se le acaba de enviar, en caso de no recibir el mensaje porfavor revise su bandeja de spam.",

	'uservalidationbyemail:admin:no_unvalidated_users' => 'Usuarios invalidados.',

	'uservalidationbyemail:admin:unvalidated' => 'Usuarios sin validar',
	'uservalidationbyemail:admin:user_created' => 'Registrado %s',
	'uservalidationbyemail:admin:resend_validation' => 'Reenviar validaci髇',
	'uservalidationbyemail:admin:validate' => 'Validar',
	'uservalidationbyemail:admin:delete' => 'Borrar',
	'uservalidationbyemail:confirm_validate_user' => 'Validar %s?',
	'uservalidationbyemail:confirm_resend_validation' => 'Reenviar mensaje de validaci髇 a %s?',
	'uservalidationbyemail:confirm_delete' => 'Borrar %s?',
	'uservalidationbyemail:confirm_validate_checked' => 'Validar los usuarios seleccionados?',
	'uservalidationbyemail:confirm_resend_validation_checked' => 'Reenviar validaci髇 para los usuarios seleccionados?',
	'uservalidationbyemail:confirm_delete_checked' => 'Eliminar los usuarios seleccionados?',
	'uservalidationbyemail:check_all' => 'Todo',

	'uservalidationbyemail:errors:unknown_users' => 'Usuarios desconocidos',
	'uservalidationbyemail:errors:could_not_validate_user' => 'No se pudo validar el usuario.',
	'uservalidationbyemail:errors:could_not_validate_users' => 'No se pudo validar todos los usuarios seleccionados.',
	'uservalidationbyemail:errors:could_not_delete_user' => 'No se puede eliminar el usuario.',
	'uservalidationbyemail:errors:could_not_delete_users' => 'No se pudo eliminar a todos los usuarios seleccionados.',
	'uservalidationbyemail:errors:could_not_resend_validation' => 'No se pudo enviar solicitud de validacion.',
	'uservalidationbyemail:errors:could_not_resend_validations' => 'No se puede volver a enviar todas las solicitudes de validacion para los usuarios seleccionados.',

	'uservalidationbyemail:messages:validated_user' => 'Usuario validado.',
	'uservalidationbyemail:messages:validated_users' => 'Todos los usuarios seleccionados han sido validados.',
	'uservalidationbyemail:messages:deleted_user' => 'Usuario eliminado.',
	'uservalidationbyemail:messages:deleted_users' => 'Todos los usuarios seleccionados han sido borrados.',
	'uservalidationbyemail:messages:resent_validation' => 'Solicitud de validacion reciente.',
	'uservalidationbyemail:messages:resent_validations' => 'Las solicitudes de validacion han sido reenviadas a todos los usuarios seleccionados.'

);

add_translation("en", $english);
