import fetch from 'isomorphic-fetch';

export default (data) => new Promise((resolve, reject) => {

  const url = '/api/createEvent';
  const options = {
    method: 'POST',
    credentials: 'include',
    headers: {
      'Content-Type': 'application/json',
      'accept': 'application/json'
    },
    body: JSON.stringify(data)
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
