// los componentes internos traen servicios de js/Services/
// debería traerse aquí el servicio y pasarlo como propiedad a los interiores
import React from 'react';
import ReactDOM from 'react-dom';
import ItemsDT from '../components/ItemsDT';
import getAll from '../services/itemsSrv';
import LoadinSpinner from '../components/LoadingSpinner';

if (document.getElementById('items-dt')) {
  let element = document.getElementById('items-dt');
  ReactDOM.render(<LoadinSpinner/>, element);
  getAll()
    .then(data =>
      ReactDOM.render(<ItemsDT items={data}/>, element)
    );
}
