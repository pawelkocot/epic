import {createAction} from 'redux-actions';
import loadEventsRequest from '../../services/api/loadEventGroupsRequest';

export const LOAD_EVENT_GROUPS_REQUEST = 'EVENT_GROUPS/LOAD_REQUEST';
export const LOAD_EVENT_GROUPS_SUCCESS = 'EVENT_GROUPS/LOAD_SUCCESS';
export const LOAD_EVENT_GROUPS_FAILURE = 'EVENT_GROUPS/LOAD_FAILURE';

const startRequest = createAction(LOAD_EVENT_GROUPS_REQUEST);
const requestSuccess = createAction(LOAD_EVENT_GROUPS_SUCCESS);
const requestFailure = createAction(LOAD_EVENT_GROUPS_FAILURE);

export const loadEventGroups = () => (dispatch) => {
  dispatch(startRequest());

  loadEventsRequest()
    .then(events => dispatch(requestSuccess(events)))
    .catch(error => {
      dispatch(requestFailure(error))
    })
};
