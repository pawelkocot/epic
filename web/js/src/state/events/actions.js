import {createAction} from 'redux-actions';
import loadEventsRequest from '../../services/api/loadEventsRequest';

export const LOAD_EVENTS_REQUEST = 'EVENTS/LOAD_REQUEST';
export const LOAD_EVENTS_SUCCESS = 'EVENTS/LOAD_SUCCESS';
export const LOAD_EVENTS_FAILURE = 'EVENTS/LOAD_FAILURE';

export const CREATE_EVENT_SUCCESS = 'EVENT/CREATE_SUCCESS';

const requestEvents = createAction(LOAD_EVENTS_REQUEST);
const eventsLoadingSuccess = createAction(LOAD_EVENTS_SUCCESS);
const eventsLoadingFailure = createAction(LOAD_EVENTS_FAILURE);

export const loadEvents = () => (dispatch) => {
  dispatch(requestEvents());

  loadEventsRequest()
    .then(events => dispatch(eventsLoadingSuccess(events)))
    .catch(error => {
      console.log(error);
      dispatch(eventsLoadingFailure(error))
    })
}

export const createEventSuccess = createAction(CREATE_EVENT_SUCCESS);
