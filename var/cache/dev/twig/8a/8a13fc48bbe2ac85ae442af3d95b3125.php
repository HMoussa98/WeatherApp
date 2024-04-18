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

/* klant/contract_index.html.twig */
class __TwigTemplate_be21754a42700593f54a449fc0301e01 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "klant/contract_index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "klant/contract_index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "klant/contract_index.html.twig", 1);
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

        echo "Contract Overzicht";
        
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
        echo "    <header class=\"bg-blue p-0\">
        <!-- Header inhoud hier -->
    </header>

    <div class=\"container-fluid\">
        <h1>Contract Overzicht</h1>

        ";
        // line 14
        echo "        <form method=\"get\" action=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contract_index");
        echo "\">
            <div class=\"form-group\">
                <div class=\"input-group\">
                    <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Zoek contracten...\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "request", [], "any", false, false, false, 17), "query", [], "any", false, false, false, 17), "get", ["search", ""], "method", false, false, false, 17), "html", null, true);
        echo "\">
                    <div class=\"input-group-append\">
                        <button type=\"submit\" class=\"btn btn-default\">Zoeken</button>
                    </div>
                </div>
            </div>
        </form>

        <div class=\"scrollable-table\">
            <table class=\"table\">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Klant ID</th>
                    <th>Startdatum</th>
                    <th>Einddatum</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["contracts"]) || array_key_exists("contracts", $context) ? $context["contracts"] : (function () { throw new RuntimeError('Variable "contracts" does not exist.', 37, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["contract"]) {
            // line 38
            echo "                    <tr>
                        <td>";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contract"], "id", [], "any", false, false, false, 39), "html", null, true);
            echo "</td>
                        <td>";
            // line 40
            ((twig_get_attribute($this->env, $this->source, $context["contract"], "klant", [], "any", false, false, false, 40)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["contract"], "klant", [], "any", false, false, false, 40), "id", [], "any", false, false, false, 40), "html", null, true))) : (print ("Geen klant toegewezen")));
            echo "</td>
                        <td>";
            // line 41
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contract"], "startdatum", [], "any", false, false, false, 41), "d-m-Y"), "html", null, true);
            echo "</td>
                        <td>";
            // line 42
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["contract"], "einddatum", [], "any", false, false, false, 42), "d-m-Y"), "html", null, true);
            echo "</td>
                        <!-- Voeg hier eventuele actieknoppen toe -->
                    </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 46
            echo "                    <tr>
                        <td colspan=\"7\">Geen contracten gevonden.</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['contract'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                </tbody>
            </table>
        </div>

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
        return "klant/contract_index.html.twig";
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
        return array (  165 => 50,  156 => 46,  147 => 42,  143 => 41,  139 => 40,  135 => 39,  132 => 38,  127 => 37,  104 => 17,  97 => 14,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Contract Overzicht{% endblock %}

{% block body %}
    <header class=\"bg-blue p-0\">
        <!-- Header inhoud hier -->
    </header>

    <div class=\"container-fluid\">
        <h1>Contract Overzicht</h1>

        {# Zoekformulier #}
        <form method=\"get\" action=\"{{ path('contract_index') }}\">
            <div class=\"form-group\">
                <div class=\"input-group\">
                    <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Zoek contracten...\" value=\"{{ app.request.query.get('search', '') }}\">
                    <div class=\"input-group-append\">
                        <button type=\"submit\" class=\"btn btn-default\">Zoeken</button>
                    </div>
                </div>
            </div>
        </form>

        <div class=\"scrollable-table\">
            <table class=\"table\">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Klant ID</th>
                    <th>Startdatum</th>
                    <th>Einddatum</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                {% for contract in contracts %}
                    <tr>
                        <td>{{ contract.id }}</td>
                        <td>{{ contract.klant ? contract.klant.id : 'Geen klant toegewezen' }}</td>
                        <td>{{ contract.startdatum|date('d-m-Y') }}</td>
                        <td>{{ contract.einddatum|date('d-m-Y') }}</td>
                        <!-- Voeg hier eventuele actieknoppen toe -->
                    </tr>
                {% else %}
                    <tr>
                        <td colspan=\"7\">Geen contracten gevonden.</td>
                    </tr>
                {% endfor %}
                </tbody>
            </table>
        </div>

    </div>
{% endblock %}
", "klant/contract_index.html.twig", "C:\\Users\\noah-\\zand1\\WeatherApp\\templates\\klant\\contract_index.html.twig");
    }
}
