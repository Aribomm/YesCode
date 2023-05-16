

{# {% extends 'base.html.twig' %}

{% block title %}Hello HomeController!{% endblock %}

{% block body %}

 #}








{# 
{% set item = { "nom": "pomme", "forme": "ronde" } %}


{% set item = "wow oui oui" %}

<h2>
{{item}}
</h2> #}















{# 
==== filter twig

<p>{{city}}</p>

<p>{{city | upper }}</p>

<p>{{city | title}}</p>
======================================================
 #}

{# 
<h2>Nos Jeux</h2>
<hr>
{% for game,multi in games %}
<h3>{{loop.index}} {{game}}</h3>
<h4> {{multi}}</h4>
    
{% endfor %}
===========================================================
 #}



{# for table multidimensionale
<h2>Nos Jeux</h2>
<hr>
{% for game,multi in games %}
<h3>{{game}}</h3>
    <h4>{{multi}}</h4>
{% endfor %}

{# table
{% for games in games %}

<h3>{{games}}</h3>
    
{% endfor %}
 #}



{# ================ =====================================#}
{# 

boucle if ==============
{% if true %}

      <p>c'eci est vrai</p>
{% endif %}
=====================
{% if user.isConnected  %}
<button>Connexion</button>


{% else %}
    <button>Deconnexxion</button>
{% endif %}
 #}
    


{# 
{% endblock %} #}
