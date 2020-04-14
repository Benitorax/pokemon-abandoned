import '../css/app.scss';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';


import React from "react";
import { render } from 'react-dom';
import PokemonApp from './Component/Pokemon';

render(
    <PokemonApp/>,
    document.getElementById('root')
);