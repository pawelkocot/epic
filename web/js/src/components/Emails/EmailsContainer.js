import React from 'react';
import {connect} from 'react-redux';
// import {loadEmails} from '../../state/actions';

class EventsContainer extends React.Component {
  componentWillMount() {
    // if (!this.props.loading && !this.props.loaded) {
    //   this.props.loadEvents();
    // }
  }

  render() {
    return (
      <div>
        emails
      </div>
    );
  }
}


const mapStateToProps = state => {
  return {
  };
};

const mapDispatchToProps = {
};

export default connect(mapStateToProps, mapDispatchToProps)(EventsContainer);
