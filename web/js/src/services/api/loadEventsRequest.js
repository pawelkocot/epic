import fetch from 'isomorphic-fetch';

export default () => new Promise((resolve, reject) => {
  const url = '/api/events';
  const options = {
    method: 'GET',
    credentials: 'include',
    headers: {
      'Content-Type': 'application/json',
      'accept': 'application/json'
    }
  };

  fetch(url, options)
    .then(response => {
      if (response.status == 200) {
        response.json().then(resolve);
      }
      else if (response.status == 401) {
        reject('401 Unauthorized');
      }
      else {
        response.json().then(reject);
      }
    })
    .catch(() => reject('error'));
});
