<?php

/* AppBundle::layout.html.twig */
class __TwigTemplate_53f8ae35daa2206195b63a2f1af85b4f94d61251ae372a3a3d0a8677c0739cac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body_id' => array($this, 'block_body_id'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <!-- TODO: Decide whether to zoom or not to zoom - that's the question @see: http://getbootstrap.com/css/#overview-mobile
        <!--<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">-->
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\">
        <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 16
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body ";
        // line 18
        $this->displayBlock('body_id', $context, $blocks);
        echo ">
        ";
        // line 19
        $this->env->loadTemplate("AppBundle::navbar.html.twig")->display($context);
        // line 20
        echo "        <div class=\"container-fluid\">
            <div class=\"row\"></div>
                ";
        // line 22
        $this->displayBlock('body', $context, $blocks);
        // line 23
        echo "                ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 29
        echo "            </div>
        </div>
    </body>
</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, (isset($context["installation_name"]) ? $context["installation_name"] : null), "html", null, true);
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "            <!-- Bootstrap -->
            <link href=\"//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/slate/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
            <link href=\"//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\" media=\"screen\">
            <link href=\"/css/badminton.css\" rel=\"stylesheet\" media=\"screen\">

        ";
    }

    // line 18
    public function block_body_id($context, array $blocks = array())
    {
    }

    // line 22
    public function block_body($context, array $blocks = array())
    {
    }

    // line 23
    public function block_javascripts($context, array $blocks = array())
    {
        // line 24
        echo "                <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
                <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
                <!-- Include all JavaScripts, compiled by Assetic -->
                <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
                ";
    }

    public function getTemplateName()
    {
        return "AppBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 27,  102 => 25,  99 => 24,  96 => 23,  91 => 22,  86 => 18,  77 => 10,  74 => 9,  68 => 8,  60 => 29,  57 => 23,  55 => 22,  51 => 20,  49 => 19,  45 => 18,  39 => 16,  37 => 9,  33 => 8,  24 => 1,);
    }
}
