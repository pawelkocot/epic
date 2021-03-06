import {handleActions} from 'redux-actions';
import {LOAD_EVENTS_REQUEST, LOAD_EVENTS_SUCCESS, LOAD_EVENTS_FAILURE, CREATE_EVENT_SUCCESS} from './actions';
import {UPLOAD_ATTACHMENT_SUCCESS} from './actions';

const initialState = {
  loading: false,
  loaded: false,
  failure: false,
  errorMessage: '',

  events: []
};

export default handleActions({
  [LOAD_EVENTS_REQUEST]: (state) => ({
    ...state,
    ...initialState,
    loading: true
  }),

  [LOAD_EVENTS_SUCCESS]: (state, {payload:events}) => ({
    ...state,
    failure: false,
    loading: false,
    loaded: true,
    events
  }),

  [LOAD_EVENTS_FAILURE]: (state, {payload:errorMessage}) => ({
    ...state,
    failure: true,
    loading: false,
    loaded: false,
    errorMessage
  }),

  [CREATE_EVENT_SUCCESS]: (state, {payload:event}) => ({
    ...state,
    events: [...state.events, event]
  }),

  [UPLOAD_ATTACHMENT_SUCCESS]: (state, {payload:updatedEvent}) => ({
    ...state,
    events: state.events.map(event => event.id === updatedEvent.id ? updatedEvent : event)
  })
}, initialState);
