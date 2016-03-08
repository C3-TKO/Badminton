<?php

/* AppBundle::pagination.html.twig */
class __TwigTemplate_bbac692b632052d63f875495a8500248adab762d6131c868fc5af06e81c168b9 extends Twig_Template
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
        echo "<div class=\"col-xs-12\">
    <div class=\"text-center\">
        ";
        // line 3
        if (($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "current", array()) > $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "min", array()))) {
            // line 4
            echo "        <a class=\"btn btn-default\" href=\"";
            echo $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"));
            echo "/";
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "current", array()) - 1), "html", null, true);
            echo "\" role=\"button\"><i class=\"fa fa-chevron-left\"></i> Vorher</a>
        ";
        }
        // line 6
        echo "        ";
        if (($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "current", array()) < $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "max", array()))) {
            // line 7
            echo "        <a class=\"btn btn-default\" href=\"";
            echo $this->env->getExtension('routing')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"));
            echo "/";
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "current", array()) + 1), "html", null, true);
            echo "\" role=\"button\">Später <i class=\"fa fa-chevron-right\"></i></a>
        ";
        }
        // line 9
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "AppBundle::pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 9,  36 => 7,  33 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }
}
