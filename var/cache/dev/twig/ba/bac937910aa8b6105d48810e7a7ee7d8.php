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

/* service_manage/index.html.twig */
class __TwigTemplate_6cadd3c4b18fd1131436bb26e678173c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "service_manage/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "service_manage/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "service_manage/index.html.twig", 1);
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

        echo "Service Management Dashboard";
        
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
        <h1>Service Management Dashboard</h1>

        <div class=\"scrollable-table\">
            <table class=\"table\">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Contract Details</th>
                    <th>Type</th>
                    <th>Startdatum</th>
                    <th>Einddatum</th>
                    <th>Status</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 26
        if ( !twig_test_empty((isset($context["klant"]) || array_key_exists("klant", $context) ? $context["klant"] : (function () { throw new RuntimeError('Variable "klant" does not exist.', 26, $this->source); })()))) {
            // line 27
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["klant"]);
            foreach ($context['_seq'] as $context["_key"] => $context["klant"]) {
                // line 28
                echo "                        <tr>
                            <td>";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "id", [], "any", false, false, false, 29), "html", null, true);
                echo "</td>
                            <td>";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "naam", [], "any", false, false, false, 30), "html", null, true);
                echo "</td>
                            <td>";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "email", [], "any", false, false, false, 31), "html", null, true);
                echo "</td>
                            <td>";
                // line 32
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "telefoonnummer", [], "any", false, false, false, 32), "html", null, true);
                echo "</td>
                            <td>";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "contractDetails", [], "any", false, false, false, 33), "html", null, true);
                echo "</td>
                            <td>";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "type", [], "any", false, false, false, 34), "html", null, true);
                echo "</td>
                            <td>";
                // line 35
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "startdatum", [], "any", false, false, false, 35), "Y-m-d"), "html", null, true);
                echo "</td>
                            <td>";
                // line 36
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "einddatum", [], "any", false, false, false, 36), "Y-m-d"), "html", null, true);
                echo "</td>
                            <td>";
                // line 37
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "status", [], "any", false, false, false, 37), "html", null, true);
                echo "</td>
                            <td>
                                <!-- Acties zoals eerder gedefinieerd -->
                                <a href=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klant_verwijderen", ["id" => twig_get_attribute($this->env, $this->source, $context["klant"], "id", [], "any", false, false, false, 40)]), "html", null, true);
                echo "\" class=\"btn btn-danger\" onclick=\"return confirm('Weet je zeker dat je deze klant wilt verwijderen?');\">Verwijderen</a>
                                <a href=\"#\" class=\"btn btn-primary\">Details</a>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['klant'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "                ";
        } else {
            // line 46
            echo "                    <tr>
                        <td colspan=\"10\">Geen klanten gevonden.</td>
                    </tr>
                ";
        }
        // line 50
        echo "                </tbody>
            </table>
        </div>

        <a href=\"";
        // line 54
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klant_nieuw");
        echo "\" class=\"btn btn-primary\">Nieuwe Klant Toevoegen</a>
        <a href=\"";
        // line 55
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contract_index");
        echo "\" class=\"btn btn-primary\">Contract Index</a>
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
        return "service_manage/index.html.twig";
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
        return array (  188 => 55,  184 => 54,  178 => 50,  172 => 46,  169 => 45,  158 => 40,  152 => 37,  148 => 36,  144 => 35,  140 => 34,  136 => 33,  132 => 32,  128 => 31,  124 => 30,  120 => 29,  117 => 28,  112 => 27,  110 => 26,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Service Management Dashboard{% endblock %}

{% block body %}
    <div class=\"container\">
        <h1>Service Management Dashboard</h1>

        <div class=\"scrollable-table\">
            <table class=\"table\">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Contract Details</th>
                    <th>Type</th>
                    <th>Startdatum</th>
                    <th>Einddatum</th>
                    <th>Status</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                {% if klant is not empty %}
                    {% for klant in klant %}
                        <tr>
                            <td>{{ klant.id }}</td>
                            <td>{{ klant.naam }}</td>
                            <td>{{ klant.email }}</td>
                            <td>{{ klant.telefoonnummer }}</td>
                            <td>{{ klant.contractDetails }}</td>
                            <td>{{ klant.type }}</td>
                            <td>{{ klant.startdatum|date('Y-m-d') }}</td>
                            <td>{{ klant.einddatum|date('Y-m-d') }}</td>
                            <td>{{ klant.status }}</td>
                            <td>
                                <!-- Acties zoals eerder gedefinieerd -->
                                <a href=\"{{ path('klant_verwijderen', { 'id': klant.id }) }}\" class=\"btn btn-danger\" onclick=\"return confirm('Weet je zeker dat je deze klant wilt verwijderen?');\">Verwijderen</a>
                                <a href=\"#\" class=\"btn btn-primary\">Details</a>
                            </td>
                        </tr>
                    {% endfor %}
                {% else %}
                    <tr>
                        <td colspan=\"10\">Geen klanten gevonden.</td>
                    </tr>
                {% endif %}
                </tbody>
            </table>
        </div>

        <a href=\"{{ path('klant_nieuw') }}\" class=\"btn btn-primary\">Nieuwe Klant Toevoegen</a>
        <a href=\"{{ path('contract_index') }}\" class=\"btn btn-primary\">Contract Index</a>
    </div>
{% endblock %}", "service_manage/index.html.twig", "C:\\Users\\noah-\\zand1\\WeatherApp\\templates\\service_manage\\index.html.twig");
    }
}
