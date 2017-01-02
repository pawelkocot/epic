import {SubmissionError} from 'redux-form';
import createEventRequest from '../../services/api/createEventRequest';
import {hashHistory} from 'react-router';

export default (values, dispatch) => createEventRequest(values)
  .then(() => {
    hashHistory.push('/');
  })
  .catch(_error => {
    throw new SubmissionError({_error})
  });
