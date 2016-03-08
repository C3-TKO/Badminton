<?php

/* AppBundle::navbar.html.twig */
class __TwigTemplate_3460d3c1c07d66bf405cd9f089f09ade8367cb9f859bd0dd820c01ab278907be extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"navbar navbar-default\">
    <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-responsive-collapse\">
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
        </button>
        <a class=\"navbar-brand\" href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("home");
        echo "\"><i class=\"fa fa-home\"></i> ";
        echo twig_escape_filter($this->env, (isset($context["installation_name"]) ? $context["installation_name"] : null), "html", null, true);
        echo "</a>
    </div>
    <div class=\"navbar-collapse collapse navbar-responsive-collapse\">
        <ul class=\"nav navbar-nav navbar-right\">
            ";
        // line 12
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 13
            echo "            <li><a class=\"link\" href=\"";
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\"><i class=\"fa fa-sign-out fa-fw fa-lg\"></i> Logout</a></li>
            <li><a href=\"";
            // line 14
            echo $this->env->getExtension('routing')->getPath("add_game");
            echo "\"><i class=\"fa fa-plus fa-fw fa-lg\"></i> Spiel eintragen</a></li>
            <li><a href=\"";
            // line 15
            echo $this->env->getExtension('routing')->getPath("scheduling");
            echo "\"><i class=\"fa fa-th-list fa-fw fa-lg\"></i> Spielplan erstellen</a></li>
            ";
        } else {
            // line 17
            echo "            <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\"><i class=\"fa fa-sign-in fa-fw fa-lg\"></i> Login</a></li>
            ";
        }
        // line 19
        echo "            <li><a href=\"";
        echo $this->env->getExtension('routing')->getPath("ranking");
        echo "\"><i class=\"fa fa-trophy fa-fw fa-lg\"></i> Ranking</a></li>
            <li><a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("results");
        echo "\"><i class=\"fa fa-list-alt fa-fw fa-lg\"></i> Ergebnisse</a></li>
        </ul>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "AppBundle::navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 20,  59 => 19,  53 => 17,  48 => 15,  44 => 14,  39 => 13,  37 => 12,  28 => 8,  19 => 1,);
    }
}
