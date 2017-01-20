import fetch from 'isomorphic-fetch';
import {getApiUrl} from '../config';

export const createUrl = endpoint => {
  let url = getApiUrl();

  if (url.match(/\/$/) && endpoint.match(/^\//)) {
    url += endpoint.replace(/^\//, '');
  } else {
    url += endpoint;
  }

  return url;
}

const request = (endpoint, method, data) => new Promise((resolve, reject) => {
  const url = createUrl(endpoint);
  const options = {
    method,
    credentials: 'include',
    headers: {
      'Content-Type': 'application/json',
      'accept': 'application/json'
    },
    body: data ? JSON.stringify(data) : undefined
  };

  fetch(url, options)
    .then(response => {
      if (response.status === 200) {
        response.json().then(resolve);
      } else {
        reject('Error '+response.status);
      }
    })
    .catch(() => reject('error'));
});

export const get = (endpoint) => request(endpoint, 'GET');
export const post = (endpoint, data) => request(endpoint, 'POST', data);
