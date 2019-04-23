import React, {Component} from 'react';
import axios from "axios";
import swal from "sweetalert";
import moment from "moment";
import 'moment/locale/es';

export default class ProyectosDT extends Component {
  constructor(props) {
    super(props);
    this.myTable = React.createRef();
  }

  componentDidMount() {
    window.$.fn.dataTable.ext.buttons.nuevo = {
      text: 'Nuevo proyecto',
      className: 'btnNuevoProyecto',
      action: function (e, dt, node, config) {
        window.location.href = '/admin/proyectos/nuevo';
      }
    };
    let tablaProyecto = window.$(this.myTable.current).DataTable({
      language: {url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'},
      aaSorting: [],
      lengthChange: false,
      buttons: ['nuevo'],
      initComplete: function (settings, json) {
        tablaProyecto.buttons().container().appendTo('#proyectos-dt .col-md-6:eq(0)');
        window.$(".btnNuevoProyecto").removeClass("btn-secondary").addClass("btn-primary");
        window.$('div.dataTables_filter input').focus();
      }
    });
  }

  deleteRow = item => {
    swal({
      title: "Atención!",
      text: `¿Seguro desea eliminar al proyecto ${item.nombre}?`,
      icon: "warning",
      buttons: ["Cancelar", "Eliminar"],
      dangerMode: true,
      closeOnClickOutside: false,
    })
      .then((willDelete) => {
        if (willDelete) {
          axios.delete(`/admin/proyectos/${item.id}`);
          swal("Proyecto eliminado con éxito!", {
            icon: "success",
          });
          //eliminamos la fila de la tabla
          $(`#row${item.id}`).remove();
        }
      });
  }

  render() {
    return (
      <div className="card">
        <div className="card-body">
          <table ref={this.myTable} className="table table-striped table-bordered table-hover" style={{width: '100%'}}>
            <thead>
            <tr>
              <th>Nombre</th>
              <th>Líder</th>
              <th>Creado</th>
              <th>Estimado</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            {this.props.proyectos.map(item => (
              <tr key={item.id} id={`row${item.id}`}>
                <td className="text-capitalize">{item.nombre}</td>
                <td>{item.lider}</td>
                <td>{moment(new Date(item.created_at)).fromNow()}</td>
                <td> {item.fechaEstimada && moment(new Date(item.fechaEstimada)).format("DD-MM-YY")}</td>
                <td>
                  <div className="wrapper text-center">
                    <div className="btn-group btn-group-sm display-1">
                      <a href={`/admin/proyectos/${item.id}`} className="btn btn-primary">
                        <i className="fa fa-eye"></i>
                      </a>
                      <a href={`/admin/proyectos/${item.id}/editar`} className="btn btn-primary">
                        <i className="fa fa-edit"></i>
                      </a>
                      <a href="#" className="btn btn-primary btn-delete" id="btn-medico-delete"
                         onClick={() => this.deleteRow(item)}>
                        <i className="fa fa-trash"></i>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
            ))}
            </tbody>
          </table>
        </div>
      </div>
    );
  }
}
