# Secure PHP v0.1

## Sécurisez simplement votre site en PHP

Installation

Télécharger ce GitHub dans votre projet puis ajoutez cette ligne au début de tous vos fichiers

```php
require_once("security/functions.php");
```

Exemples

### Sécuriser un URL

```php
//Url : https://monsite.com/search?q=<script>alert("Hello World")</script>

// Méthode $_GET simple :

print_r($_GET);
/*

Array(
  [q] => <script>alert("Hello World")</script>
)

*/

// Méthode $_XGET

print_r($_XGET);
/*

Array(
  [q] => &lt;script&gt;alert(&quot;Hello World&quot;)&lt;/script&gt;
)

*/

// Pareil avec $_XPOST
```

### Afficher un captcha
```php
if($_XPOST)
{
	if(validCaptcha("POST")) // On dois renseigner la méthode de transfert du formulaire
	{
		echo "Captcha is valid ".$_XPOST["username"]." !";
	}
	else
	{
		echo "Captcha is invalid :/";
	}
}
?>

<form method="POST">
	<label for="name">Username</label>
	<input name="username">
	<?= generateCaptcha() ?>
	<input type="submit">
</form>
```
<img src="https://zupimages.net/up/22/18/t3zw.png">
