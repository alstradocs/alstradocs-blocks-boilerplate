import * as React from 'react';
import { Component } from '@wordpress/element';
export interface LandingFormProps {

}

export interface LandingFormState {

}

class LandingForm extends Component<LandingFormProps> {
    state = {  }
    constructor(props: LandingFormProps) {
        super(props);
    }
    render() {
        return (<form action="<?php echo get_site_url(); ?>/order" method="post" className="wpcf7-form">

            <div className="subscribe_here">
                <p>
                    <span className="wpcf7-form-control-wrap your-name">
                        <input type="text" name="title" value="" size={40}
                            className="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                            aria-required="true" aria-invalid="false" placeholder="Paper Title *" />
                    </span>
                </p>
                <p>
                    <span className="wpcf7-form-control-wrap phone">
                        <select className="wpcf7-form-control wpcf7-text wpcf7-validates-as-required wpcf7" name="documentType">
                            <option value="">- Please select document type -</option>
                            <option value="1" data-factor="1.10">Essay</option>
                            <option value="2" data-factor="1.20">Term Paper</option>
                            <option value="3" data-factor="1.30">Dissertation</option>
                            <option value="4" data-factor="1.10">Coursework</option>
                            <option value="5" data-factor="1.20">Other</option>
                        </select>
                    </span>
                </p>
                <p>
                    <span className="wpcf7-form-control-wrap your-email">
                        <select className="wpcf7-form-control wpcf7-text wpcf7-validates-as-required wpcf7" name="discipline">
                            <option value="">- Please select discipline- </option>
                            <option value="1" data-factor="1.00">Art</option>
                            <option value="2" data-factor="1.00">Architecture</option>
                            <option value="3" data-factor="1.00">Business</option>
                            <option value="4" data-factor="1.00">Economics</option>
                            <option value="5" data-factor="1.00">English</option>
                            <option value="6" data-factor="1.00">Finance</option>
                            <option value="7" data-factor="1.00">History</option>
                            <option value="8" data-factor="1.00">Journalism</option>
                            <option value="9" data-factor="1.00">Law</option>
                            <option value="10" data-factor="1.00">Literature</option>
                            <option value="11" data-factor="1.00">Nursing</option>
                        </select>
                    </span>
                </p>
                <p>
                    <span className="wpcf7-form-control-wrap your-email">
                        <input type="email" name="emailAddress" value="" size={40}
                            className="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                            aria-required="true" aria-invalid="false" placeholder="Email *" />
                    </span>
                </p>
                <p><input type="submit" value="Get It Nows" className="wpcf7-form-control wpcf7-submit" /></p>
            </div>

            <div className="wpcf7-response-output wpcf7-display-none" aria-hidden="true"></div>
        </form>
        );
    }
}

export default LandingForm;