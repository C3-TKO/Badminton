<?php

/* AppBundle:Schedule:scheduling_result.html.twig */
class __TwigTemplate_d9ce3fc93c5ff658449757376a92fdcc4be0d6bf6cd9071e4b5534ec6ae7b602 extends Twig_Template
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
            'javascripts' => array($this, 'block_javascripts'),
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
        echo "    <!-- Modal -->
    <div class=\"modal fade\" id=\"addGameModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
        <div class=\"modal-dialog\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                    <h4 class=\"modal-title\" id=\"myModalLabel\">Ergebnis</h4>
                </div>
                <div class=\"modal-body row\">

                    <form>
                        <div class=\"col-xs-6\">
                            <div class=\"form-group\">
                                <label for=\"team_a_score\" class=\"control-label\">Team A</label>
                                <input type=\"text\" class=\"form-control\" id=\"team_a_score\" maxlength=\"2\">
                                <input type=\"hidden\" id=\"id_team_a\">
                            </div>
                        </div>

                        <div class=\"col-xs-6\">
                            <div class=\"form-group\">
                                <label for=\"team_b_score\" class=\"control-label\">Team B</label>
                                <input type=\"text\" class=\"form-control\" id=\"team_b_score\" maxlength=\"2\">
                                <input type=\"hidden\" id=\"id_team_b\">
                            </div>
                        </div>
                    </form>

                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Abbrechen</button>
                    <button id=\"add_game_button\" type=\"button\" class=\"btn btn-primary\">Speichern</button>
                </div>
            </div>
        </div>
    </div>

    <div id=\"schedule_container\">
    </div>
";
    }

    // line 45
    public function block_javascripts($context, array $blocks = array())
    {
        // line 46
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script>

        jQuery( document ).ready(
            loadSchedule()
        )

        jQuery('#addGameModal').on('show.bs.modal', function (event) {
            var button      = jQuery(event.relatedTarget)
            var idTeamA     = button.data('id-team-a')
            var idTeamB     = button.data('id-team-b')
            var nameTeamA   = button.data('name-team-a')
            var nameTeamB   = button.data('name-team-b')
            var modal       = jQuery(this)
            modal.find('#id_team_a').val(idTeamA)
            modal.find('#id_team_b').val(idTeamB)

            modal.find('label[for=\"team_a_score\"]').text(nameTeamA)
            modal.find('label[for=\"team_b_score\"]').text(nameTeamB)

            modal.find('#add_game_button').on('click', function () {
                jQuery.ajax({
                    method: 'GET',
                    url: Routing.generate('schedule_update', { index: button.data('index'), teamAScore: jQuery('#team_a_score').val(), teamBScore: jQuery('#team_b_score').val() })
                }).done(function(data) {
                    console.log(data)
                    jQuery('#team_a_score').val('')
                    jQuery('#team_b_score').val('')
                    jQuery('#add_game_button').unbind('click')
                    modal.modal('hide')
                    loadSchedule()
                })
            })
        })


        // Loads the DOM Elements of the schedule
        function loadSchedule() {

            var schedule = jQuery('#schedule_container')

            schedule.empty();

            jQuery.ajax({
                method: 'GET',
                url: Routing.generate('schedule_load')
            }).done(function(data) {
                schedule.append(data)
            })
        }

    </script>
";
    }

    public function getTemplateName()
    {
        return "AppBundle:Schedule:scheduling_result.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 46,  83 => 45,  40 => 4,  37 => 3,  11 => 1,);
    }
}
