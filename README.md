<h1 align="center">Welcome to Huge-Interconnect 👋</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/version-1.0.3-blue.svg?cacheSeconds=2592000" />
</p>

> Public package for use Huge services, like auth, messaging... 

### 🏠 [Homepage](https://hugeauth.it)

## Install

```sh
composer require edoregolo/huge-interconnector
```

## Initialize
<h4>**You need a client key and client secret in order to access Huge services. (Not necessary on auth service)**</h4>

**Example code index.php: **
```php
 include 'vendor/autoload.php';
 use Huge\HugeInterconnector;
 
 $params['siteUrl'] = 'localhost/interconnector';
 $params['siteName'] = 'Localhost';
 $params['siteCallback'] = 'http://localhost/interconnector/callback.php';
 
 $ic = new HugeInterconnector($params);
 
 $url = $ic->generate_auth_url();
 
 echo '<a href="'.$url.'">Login with Huge</a>';
```

**Example code callback.php: **
```php
 include 'vendor/autoload.php';
 use Huge\HugeInterconnector;
 
 $params['siteUrl'] = 'localhost/interconnector';
 $params['siteName'] = 'Localhost';
 $params['siteCallback'] = 'http://localhost/interconnector/callback.php';
 
 $ic = new HugeInterconnector($params);
 
 $response = $ic->retrieve_auth_response();
 if($response['success']){
    echo $response['msg']['it'];
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $response['data'][0]['username'];
    $_SESSION['email'] = $response['data'][0]['email'];
    $_SESSION['active'] = $response['data'][0]['active'];
 }
```

## Author

👤 **Edoardo**

* Github: [@edoregolo](https://github.com/edoregolo)
