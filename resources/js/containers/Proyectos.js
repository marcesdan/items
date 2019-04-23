// los componentes internos traen servicios de js/Services/
// debería traerse aquí el servicio y pasarlo como propiedad a los interiores
import React from 'react';
import ReactDOM from 'react-dom';
import ProyectosDT from '../components/ProyectosDT';
import getAll from '../services/proyectosSrv';
import LoadinSpinner from '../components/LoadingSpinner';

if (document.getElementById('proyectos-dt')) {
  let element = document.getElementById('proyectos-dt');
  ReactDOM.render(<LoadinSpinner/>, element);
  getAll()
    .then(data =>
      ReactDOM.render(<ProyectosDT proyectos={data}/>, element)
    );
}
