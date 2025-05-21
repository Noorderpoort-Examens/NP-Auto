<?php

return [
    'required' => 'Het veld :attribute is verplicht.',
    'email' => 'Het veld :attribute moet een geldig e-mailadres zijn.',
    'unique' => 'De :attribute is al in gebruik.',
    'integer' => 'Ongeldig nummer.',
    'numeric' => 'Ongeldig nummer.',
    'regex' => 'Ongeldig telefoon nummer.', //if ever regex is used in other places it will need to be specified, but currently only phonenumber validates with regex classification
    'mimetypes' => 'Er is iets misgegaan, probeer de images opnieuw te sturen',
    'boolean' => 'Er is iets misgegaan, geen correcte bool value gevonden.',
    'before' => 'Er is iets misgegaan, de tijd hoort eerder te zijn dan de opgegeven eindtijd.',
    'after' => 'Er is iets misgegaan, de tijd hoort later te zijn dan de opgegeven starttijd.',
];
