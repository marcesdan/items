import axios from 'axios';

export default function getAll() {
  return axios.get('/api/admin/proyectos')
    .then(res => res.data.data)
}
