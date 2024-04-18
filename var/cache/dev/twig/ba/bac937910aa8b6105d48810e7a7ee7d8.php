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
                    <th>Type</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 22
        if ( !twig_test_empty((isset($context["klant"]) || array_key_exists("klant", $context) ? $context["klant"] : (function () { throw new RuntimeError('Variable "klant" does not exist.', 22, $this->source); })()))) {
            // line 23
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["klant"]);
            foreach ($context['_seq'] as $context["_key"] => $context["klant"]) {
                // line 24
                echo "                        <tr>
                            <td>";
                // line 25
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "id", [], "any", false, false, false, 25), "html", null, true);
                echo "</td>
                            <td>";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "naam", [], "any", false, false, false, 26), "html", null, true);
                echo "</td>
                            <td>";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "email", [], "any", false, false, false, 27), "html", null, true);
                echo "</td>
                            <td>";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "telefoonnummer", [], "any", false, false, false, 28), "html", null, true);
                echo "</td>
                            <td>";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["klant"], "type", [], "any", false, false, false, 29), "html", null, true);
                echo "</td>
                            <td>
                                <a href=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klant_verwijderen", ["id" => twig_get_attribute($this->env, $this->source, $context["klant"], "id", [], "any", false, false, false, 31)]), "html", null, true);
                echo "\" class=\"btn btn-danger\" onclick=\"return confirm('Weet je zeker dat je deze klant wilt verwijderen?');\">Verwijderen</a>
                                ";
                // line 32
                if ((twig_get_attribute($this->env, $this->source, $context["klant"], "type", [], "any", false, false, false, 32) == "Contract")) {
                    // line 33
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("contract_index", ["id" => twig_get_attribute($this->env, $this->source, $context["klant"], "id", [], "any", false, false, false, 33)]), "html", null, true);
                    echo "\" class=\"btn btn-primary\">Details</a>
                                ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 34
$context["klant"], "type", [], "any", false, false, false, 34) == "Abonnement")) {
                    // line 35
                    echo "                                    <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("abbo_bewerken", ["id" => twig_get_attribute($this->env, $this->source, $context["klant"], "id", [], "any", false, false, false, 35)]), "html", null, true);
                    echo "\" class=\"btn btn-primary\">Bewerken</a>
                                ";
                } else {
                    // line 37
                    echo "                                    <a href=\"#\" class=\"btn btn-primary\">Details</a>
                                ";
                }
                // line 39
                echo "                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['klant'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "                ";
        } else {
            // line 43
            echo "                    <tr>
                        <td colspan=\"6\">Geen klanten gevonden.</td>
                    </tr>
                ";
        }
        // line 47
        echo "
                </tbody>
            </table>
        </div>

        <a href=\"";
        // line 52
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("klant_nieuw");
        echo "\" class=\"btn btn-primary\">Nieuwe Klant Toevoegen</a>
    </div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.btn-group button');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filterValue = this.dataset.filter;
                    const rows = document.querySelectorAll('tbody tr');

                    rows.forEach(row => {
                        if (filterValue === 'all') {
                            row.style.display = 'table-row';
                        } else {
                            const type = row.dataset.type;

                            if (type === filterValue) {
                                row.style.display = 'table-row';
                            } else {
                                row.style.display = 'none';
                            }
                        }
                    });
                });
            });
        });
    </script>
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
        return array (  184 => 52,  177 => 47,  171 => 43,  168 => 42,  160 => 39,  156 => 37,  150 => 35,  148 => 34,  143 => 33,  141 => 32,  137 => 31,  132 => 29,  128 => 28,  124 => 27,  120 => 26,  116 => 25,  113 => 24,  108 => 23,  106 => 22,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
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
                    <th>Type</th>
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
                            <td>{{ klant.type }}</td>
                            <td>
                                <a href=\"{{ path('klant_verwijderen', { 'id': klant.id }) }}\" class=\"btn btn-danger\" onclick=\"return confirm('Weet je zeker dat je deze klant wilt verwijderen?');\">Verwijderen</a>
                                {% if klant.type == 'Contract' %}
                                    <a href=\"{{ path('contract_index', { 'id': klant.id }) }}\" class=\"btn btn-primary\">Details</a>
                                {% elseif klant.type == 'Abonnement' %}
                                    <a href=\"{{ path('abbo_bewerken', { 'id': klant.id }) }}\" class=\"btn btn-primary\">Bewerken</a>
                                {% else %}
                                    <a href=\"#\" class=\"btn btn-primary\">Details</a>
                                {% endif %}
                            </td>
                        </tr>
                    {% endfor %}
                {% else %}
                    <tr>
                        <td colspan=\"6\">Geen klanten gevonden.</td>
                    </tr>
                {% endif %}

                </tbody>
            </table>
        </div>

        <a href=\"{{ path('klant_nieuw') }}\" class=\"btn btn-primary\">Nieuwe Klant Toevoegen</a>
    </div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.btn-group button');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filterValue = this.dataset.filter;
                    const rows = document.querySelectorAll('tbody tr');

                    rows.forEach(row => {
                        if (filterValue === 'all') {
                            row.style.display = 'table-row';
                        } else {
                            const type = row.dataset.type;

                            if (type === filterValue) {
                                row.style.display = 'table-row';
                            } else {
                                row.style.display = 'none';
                            }
                        }
                    });
                });
            });
        });
    </script>
{% endblock %}
", "service_manage/index.html.twig", "C:\\Users\\noah-\\zand1\\WeatherApp\\templates\\service_manage\\index.html.twig");
    }
}
