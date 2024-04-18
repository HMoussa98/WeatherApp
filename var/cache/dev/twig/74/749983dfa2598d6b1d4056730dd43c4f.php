<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* klant/abbo_bewerken.html.twig */
class __TwigTemplate_b17c8924eb1e4de205e57822e65e2afe extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "klant/abbo_bewerken.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "klant/abbo_bewerken.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "klant/abbo_bewerken.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Bewerk Abonnement";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class=\"container\">
        <h1 class=\"my-4 fw-bold\">Bewerk Abonnement</h1>

        <form method=\"post\" action=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("abbo_bewerken", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["abonnement"]) || array_key_exists("abonnement", $context) ? $context["abonnement"] : (function () { throw new RuntimeError('Variable "abonnement" does not exist.', 9, $this->source); })()), "id", [], "any", false, false, false, 9)]), "html", null, true);
        echo "\" class=\"my-4\">
            <div class=\"row mb-3\">
                <label for=\"variabele\" class=\"col-sm-2 col-form-label\">Variabele</label>
                <div class=\"col-sm-10\">
                    <select name=\"variabele\" id=\"variabele\" class=\"form-control\">
                        <option value=\"TEMP\" ";
        // line 14
        if ((twig_get_attribute($this->env, $this->source, (isset($context["abonnement"]) || array_key_exists("abonnement", $context) ? $context["abonnement"] : (function () { throw new RuntimeError('Variable "abonnement" does not exist.', 14, $this->source); })()), "variabele", [], "any", false, false, false, 14) == "TEMP")) {
            echo " selected ";
        }
        echo ">TEMP</option>
                        <option value=\"DEWP\" ";
        // line 15
        if ((twig_get_attribute($this->env, $this->source, (isset($context["abonnement"]) || array_key_exists("abonnement", $context) ? $context["abonnement"] : (function () { throw new RuntimeError('Variable "abonnement" does not exist.', 15, $this->source); })()), "variabele", [], "any", false, false, false, 15) == "DEWP")) {
            echo " selected ";
        }
        echo ">DEWP</option>
                        <option value=\"STP\" ";
        // line 16
        if ((twig_get_attribute($this->env, $this->source, (isset($context["abonnement"]) || array_key_exists("abonnement", $context) ? $context["abonnement"] : (function () { throw new RuntimeError('Variable "abonnement" does not exist.', 16, $this->source); })()), "variabele", [], "any", false, false, false, 16) == "STP")) {
            echo " selected ";
        }
        echo ">STP</option>
                        <option value=\"SLP\" ";
        // line 17
        if ((twig_get_attribute($this->env, $this->source, (isset($context["abonnement"]) || array_key_exists("abonnement", $context) ? $context["abonnement"] : (function () { throw new RuntimeError('Variable "abonnement" does not exist.', 17, $this->source); })()), "variabele", [], "any", false, false, false, 17) == "SLP")) {
            echo " selected ";
        }
        echo ">SLP</option>
                        <option value=\"VISIB\" ";
        // line 18
        if ((twig_get_attribute($this->env, $this->source, (isset($context["abonnement"]) || array_key_exists("abonnement", $context) ? $context["abonnement"] : (function () { throw new RuntimeError('Variable "abonnement" does not exist.', 18, $this->source); })()), "variabele", [], "any", false, false, false, 18) == "VISIB")) {
            echo " selected ";
        }
        echo ">VISIB</option>
                        <option value=\"WDSP\" ";
        // line 19
        if ((twig_get_attribute($this->env, $this->source, (isset($context["abonnement"]) || array_key_exists("abonnement", $context) ? $context["abonnement"] : (function () { throw new RuntimeError('Variable "abonnement" does not exist.', 19, $this->source); })()), "variabele", [], "any", false, false, false, 19) == "WDSP")) {
            echo " selected ";
        }
        echo ">WDSP</option>
                        <option value=\"PRCP\" ";
        // line 20
        if ((twig_get_attribute($this->env, $this->source, (isset($context["abonnement"]) || array_key_exists("abonnement", $context) ? $context["abonnement"] : (function () { throw new RuntimeError('Variable "abonnement" does not exist.', 20, $this->source); })()), "variabele", [], "any", false, false, false, 20) == "PRCP")) {
            echo " selected ";
        }
        echo ">PRCP</option>
                        <option value=\"SNDP\" ";
        // line 21
        if ((twig_get_attribute($this->env, $this->source, (isset($context["abonnement"]) || array_key_exists("abonnement", $context) ? $context["abonnement"] : (function () { throw new RuntimeError('Variable "abonnement" does not exist.', 21, $this->source); })()), "variabele", [], "any", false, false, false, 21) == "SNDP")) {
            echo " selected ";
        }
        echo ">SNDP</option>
                    </select>
                </div>
            </div>
            <div class=\"row mb-3\">
                <label for=\"waarde\" class=\"col-sm-2 col-form-label\">Waarde</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"waarde\" id=\"waarde\" class=\"form-control\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["abonnement"]) || array_key_exists("abonnement", $context) ? $context["abonnement"] : (function () { throw new RuntimeError('Variable "abonnement" does not exist.', 28, $this->source); })()), "waarde", [], "any", false, false, false, 28), "html", null, true);
        echo "\">
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-sm-10 offset-sm-2\">
                    <button type=\"submit\" class=\"btn btn-primary\">Opslaan</button>
                </div>
            </div>
        </form>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "klant/abbo_bewerken.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  155 => 28,  143 => 21,  137 => 20,  131 => 19,  125 => 18,  119 => 17,  113 => 16,  107 => 15,  101 => 14,  93 => 9,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Bewerk Abonnement{% endblock %}

{% block body %}
    <div class=\"container\">
        <h1 class=\"my-4 fw-bold\">Bewerk Abonnement</h1>

        <form method=\"post\" action=\"{{ path('abbo_bewerken', {'id': abonnement.id}) }}\" class=\"my-4\">
            <div class=\"row mb-3\">
                <label for=\"variabele\" class=\"col-sm-2 col-form-label\">Variabele</label>
                <div class=\"col-sm-10\">
                    <select name=\"variabele\" id=\"variabele\" class=\"form-control\">
                        <option value=\"TEMP\" {% if abonnement.variabele == 'TEMP' %} selected {% endif %}>TEMP</option>
                        <option value=\"DEWP\" {% if abonnement.variabele == 'DEWP' %} selected {% endif %}>DEWP</option>
                        <option value=\"STP\" {% if abonnement.variabele == 'STP' %} selected {% endif %}>STP</option>
                        <option value=\"SLP\" {% if abonnement.variabele == 'SLP' %} selected {% endif %}>SLP</option>
                        <option value=\"VISIB\" {% if abonnement.variabele == 'VISIB' %} selected {% endif %}>VISIB</option>
                        <option value=\"WDSP\" {% if abonnement.variabele == 'WDSP' %} selected {% endif %}>WDSP</option>
                        <option value=\"PRCP\" {% if abonnement.variabele == 'PRCP' %} selected {% endif %}>PRCP</option>
                        <option value=\"SNDP\" {% if abonnement.variabele == 'SNDP' %} selected {% endif %}>SNDP</option>
                    </select>
                </div>
            </div>
            <div class=\"row mb-3\">
                <label for=\"waarde\" class=\"col-sm-2 col-form-label\">Waarde</label>
                <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"waarde\" id=\"waarde\" class=\"form-control\" value=\"{{ abonnement.waarde }}\">
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-sm-10 offset-sm-2\">
                    <button type=\"submit\" class=\"btn btn-primary\">Opslaan</button>
                </div>
            </div>
        </form>
    </div>
{% endblock %}
", "klant/abbo_bewerken.html.twig", "C:\\Users\\noah-\\zand1\\WeatherApp\\templates\\klant\\abbo_bewerken.html.twig");
    }
}
