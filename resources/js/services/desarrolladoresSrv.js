import axios from 'axios';

export default function getAll() {
  return axios.get('/api/admin/desarrolladores')
    .then(res => res.data.data)
}
