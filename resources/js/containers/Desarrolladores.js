// los componentes internos traen servicios de js/Services/
// debería traerse aquí el servicio y pasarlo como propiedad a los interiores
import React from 'react';
import ReactDOM from 'react-dom';
import DesarrolladoresDT from '../components/DesarrolladoresDT';
import getAll from '../services/desarrolladoresSrv';
import LoadinSpinner from '../components/LoadingSpinner';

if (document.getElementById('desarrolladores-dt')) {
  let element = document.getElementById('desarrolladores-dt');
  ReactDOM.render(<LoadinSpinner/>, element);
  getAll()
    .then(data =>
      ReactDOM.render(<DesarrolladoresDT desarrolladores={data}/>, element)
    );
}
