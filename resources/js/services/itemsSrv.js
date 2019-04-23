import axios from 'axios';

export default function getAll() {
  return axios.get('/api/admin/items')
    .then(res => res.data.data)
}
