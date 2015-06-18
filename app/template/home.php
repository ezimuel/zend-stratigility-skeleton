<?php $this->layout('layout', ['title' => 'Home page']) ?>

<?php $this->start('navbar') ?>
<ul class="nav navbar-nav">
    <li class="active"><a href="/">Home</a></li>
    <li><a href="/page">Page</a></li>
</ul>
<?php $this->stop() ?>

<div class="jumbotron">
  <h1>Zend stratigility skeleton</h1>
  <p class="lead">This is the skeleton template for PHP web application based on <strong>Middleware</strong> architecture using <strong>zend-stratigility</strong> component, compliant with <strong>PSR-7</strong> standard.</p>
  <p><strong>Middelware</strong> is an architectural code design between the HTTP request and response, and which can take the incoming request, perform actions based on it, and either complete the response or pass delegation on to the next middleware in the queue.</p>
  <p><a class="btn btn-lg btn-success" href="https://github.com/zendframework/zend-stratigility" role="button">More information</a></p>
</div>

<div class="row marketing">
  <div class="col-lg-6">
    <h4>What's Zend Framework?</h4>
    <p><strong>Zend Framework</strong> is a professional PHP framework since 2006.  Zend Framework 3 uses 100% object-oriented code and utilises most of the new features of <strong>PHP 5.5</strong>, namely namespaces, late static binding, lambda functions and closures, traits, etc.  </p>
    <a class="btn btn-success" href="http://framework.zend.com">More information</a>
  </div>

  <div class="col-lg-6">
    <h4>What's PSR-7?</h4>
    <p><strong>PSR-7</strong> is a PHP Framework Interop Group (FIG) standard that describes common interfaces for representing HTTP messages as described in <a href="http://tools.ietf.org/html/rfc7230">RFC 7230</a> and <a href="http://tools.ietf.org/html/rfc7231">RFC 7231</a>, and URIs for use with HTTP messages as described in <a href="http://tools.ietf.org/html/rfc3986">RFC 3986</a>.</p>
    <a class="btn btn-success" href="http://www.php-fig.org/psr/psr-7/">More information</a>
  </div>
</div>
