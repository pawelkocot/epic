import React from 'react';
import {connect} from 'react-redux';
import {loadEvents} from '../../state/actions';
import EventsList from './EventsList';

class EventsContainer extends React.Component {
  componentWillMount() {
    this.props.loadEvents();
  }

  render() {
    console.log(this.props);
    const {loading, loaded, failure, errorMessage, events} = this.props;

    return (
      <div>
        {loading && <div>Loading...</div>}
        {failure && <div>Loading failure: {errorMessage}</div>}
        {loaded && <EventsList events={events}/>}
      </div>
    );
  }
}


const mapStateToProps = state => ({
  ...state.events
});

const mapDispatchToProps = {
  loadEvents
};

export default connect(mapStateToProps, mapDispatchToProps)(EventsContainer);
