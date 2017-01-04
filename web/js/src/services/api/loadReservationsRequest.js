import fetch from 'isomorphic-fetch';

export default (eventId) => new Promise((resolve, reject) => {
  const url = `/api/reservations/${eventId}`;
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
      if (response.status === 200) {
        response.json().then(resolve);
      }
      else {
        reject('Error '+response.status);
      }
    })
    .catch(() => reject('error'));
});
