import {handleActions} from 'redux-actions';
import {LOAD_EVENT_GROUPS_REQUEST, LOAD_EVENT_GROUPS_SUCCESS, LOAD_EVENT_GROUPS_FAILURE} from './actions';

const initialState = {
  loading: false,
  loaded: false,
  failure: false,
  errorMessage: '',

  eventGroups: []
};

export default handleActions({
  [LOAD_EVENT_GROUPS_REQUEST]: (state) => ({
    ...state,
    ...initialState,
    loading: true
  }),

  [LOAD_EVENT_GROUPS_SUCCESS]: (state, {payload:eventGroups}) => ({
    ...state,
    failure: false,
    loading: false,
    loaded: true,
    eventGroups
  }),

  [LOAD_EVENT_GROUPS_FAILURE]: (state, {payload:errorMessage}) => ({
    ...state,
    failure: true,
    loading: false,
    loaded: false,
    errorMessage
  })
}, initialState);
