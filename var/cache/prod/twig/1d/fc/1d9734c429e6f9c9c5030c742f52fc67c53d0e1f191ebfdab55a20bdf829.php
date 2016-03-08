<?php

/* AppBundle:Default:results.html.twig */
class __TwigTemplate_1dfc1d9734c429e6f9c9c5030c742f52fc67c53d0e1f191ebfdab55a20bdf829 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("AppBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"row\">
    <h2 class=\"col-xs-12\">Ergebnisse vom ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : null), "html", null, true);
        echo ":</h2>
</div>
<div class=\"row\">
    <div class=\"col-xs-12\">
        <table class=\"table table-striped table-condensed\">
            <tbody>
            ";
        // line 11
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["games"]) ? $context["games"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["game"]) {
            // line 12
            echo "                <tr>
                    <td>
                        <span class=\"box ";
            // line 14
            if (($this->getAttribute($context["game"], "team_a_score", array()) > $this->getAttribute($context["game"], "team_b_score", array()))) {
                echo "box-success";
            } else {
                echo "box-danger";
            }
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "name_player_a_team_a", array()), "html", null, true);
            echo "</span>
                    </td>
                    <td>
                        <span class=\"box ";
            // line 17
            if (($this->getAttribute($context["game"], "team_a_score", array()) > $this->getAttribute($context["game"], "team_b_score", array()))) {
                echo "box-success";
            } else {
                echo "box-danger";
            }
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "name_player_b_team_a", array()), "html", null, true);
            echo "</span>
                    </td>
                    <td>
                        <span class=\"box ";
            // line 20
            if (($this->getAttribute($context["game"], "team_a_score", array()) < $this->getAttribute($context["game"], "team_b_score", array()))) {
                echo "box-success";
            } else {
                echo "box-danger";
            }
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "name_player_a_team_b", array()), "html", null, true);
            echo "</span>
                    </td>
                    <td>
                        <span class=\"box ";
            // line 23
            if (($this->getAttribute($context["game"], "team_a_score", array()) < $this->getAttribute($context["game"], "team_b_score", array()))) {
                echo "box-success";
            } else {
                echo "box-danger";
            }
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "name_player_b_team_b", array()), "html", null, true);
            echo "</span>
                    </td>
                    <td>
                        <span style=\"padding-top: 1px; display: block;\">";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "team_a_score", array()), "html", null, true);
            echo " : ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["game"], "team_b_score", array()), "html", null, true);
            echo "</span>
                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['game'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "            </tbody>
        </table>
    </div>
</div>

";
        // line 35
        $this->env->loadTemplate("AppBundle::pagination.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "AppBundle:Default:results.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 35,  119 => 30,  107 => 26,  95 => 23,  83 => 20,  71 => 17,  59 => 14,  55 => 12,  51 => 11,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
