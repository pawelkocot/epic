import {SubmissionError} from 'redux-form';
import createEventRequest from '../../services/api/createEventRequest';
import {hashHistory} from 'react-router';
import {createEventSuccess} from '../../state/actions';

export default (values, dispatch) => new Promise((resolve, reject) => {
  console.log(values)
  createEventRequest(values)
    .then(event => {
      dispatch(createEventSuccess(event));
      hashHistory.push(`/event/${event.id}`);
    })
    .catch(_error => {
      reject(new SubmissionError({_error}));
    });
});
