<?php

/* AppBundle:Schedule:schedule.html.twig */
class __TwigTemplate_f7816bb957612dc71757cf6b611b2c12a9cdd17ffe7336c033b319aef4d83001 extends Twig_Template
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
        echo "<!-- Schedule -->
";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["schedule"]) ? $context["schedule"] : $this->getContext($context, "schedule")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["game"]) {
            // line 3
            echo "    <div class=\"row\">
        <span>";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "__toString", array()), "html", null, true);
            echo "</span>
        <button type=\"button\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#addGameModal\" data-index=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "\" data-name-team-a=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "getTeamA", array()), "html", null, true);
            echo "\" data-name-team-b=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "getTeamB", array()), "html", null, true);
            echo "\" data-id-team-a=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["game"], "getTeamA", array()), "getId", array()), "html", null, true);
            echo "\" data-id-team-b=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["game"], "getTeamB", array()), "getId", array()), "html", null, true);
            echo "\">
            Ergebnis eintragen
        </button>
    </div>
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['game'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "AppBundle:Schedule:schedule.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 5,  42 => 4,  39 => 3,  22 => 2,  19 => 1,);
    }
}
