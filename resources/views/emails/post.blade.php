<x-mail::message>


<x-mail::button :url="'http://localhost:8000/'">
back to website
</x-mail::button>

<h1>{{ config('app.name') }}</h1> 

<br>
Nom : 
{{ $data['name']}}<br>
Email :
{{ $data['email']}}<br>
</p>
<br>
Téléphone : 
{{ $data['phone']}}<br>
Age : 
{{ $data['age']}}<br>
Photo :
{{ $data['photoPath']}}<br>
</p>
</x-mail::message>
