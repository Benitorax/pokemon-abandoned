import { useState, useEffect, useRef } from 'react';
import { toLowerCase } from '../Pipe/Pipe';

export function Button(props)
{        
    function onClick(e) {
        if(props.onClick) props.onClick(e);
    }
    return (
            <button 
                disabled={props.disabled}
                onClick={onClick} 
                className={`button ${props.className}`}>
                {props.buttonText}
                
            </button>
    );
}

export function Input(props)
{        
    const [lowerCaseLabel] = useState(toLowerCase(props.label));
    const [rules] = useState(props.validations);
    const [error, setError] = useState(null);
    useEffect(() => {
        setError(props.errors);
    });

    return (
        <>
            <label className="label">{props.label}</label>
            <div className={`control ${props.leftIcon && 'has-icons-left'} ${error && 'has-icons-right'}`}>
                <input 
                    className={`input ${error && 'is-danger'}`} 
                    type="text" 
                    name={props.name} 
                    type={props.type === 'password' ? 'password' : 'text' }
                    ref={props.register(
                        props.validations
                    )}
                    disabled={props.disabled}
                />
                {error &&
                    <span style={{color: 'red'}} className="icon is-small is-right">
                        <i className="fas fa-exclamation-triangle"></i>
                    </span>
                }

                {props.children}
                {error && error.type === 'required' && <p className="help is-danger">This {lowerCaseLabel} is required</p>}
                {error && error.type === 'pattern' && <p className="help is-danger">This {lowerCaseLabel} is invalid</p>}
                {error && error.type === 'minLength' && <p className="help is-danger">This {lowerCaseLabel} should have at least {rules.minLength} characters</p>}
                {error && error.type === 'maxLength' && <p className="help is-danger">This {lowerCaseLabel} can't have more than {rules.maxLength} characters</p>}
                {error && error.type === 'validate' && <p className="help is-danger">Both passwords should be the same</p>}
            </div>
        </>
    );
}