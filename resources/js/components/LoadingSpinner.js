import React, {Component} from 'react';

export default class LoadingSpinner extends Component {
  render() {
    return (
      <div className="overlay col-sm-4 offset-sm-5">
        <i className="fa fa-3x fa-spinner fa-spin"></i>
      </div>
    );
  }
}


