import request from 'superagent';
import {createUrl} from './_apiRequest';

export default (eventId, attachment) => {
  return new Promise((resolve, reject) => {
    const url = createUrl(`/uploadAttachment/${eventId}`);
    const req = request.post(url);
    req.attach('attachment', attachment);
    req.end((error, response) => {
      if (error) {
        reject(error);
      } else {
        resolve(response.body);
      }
    });
  });
};
