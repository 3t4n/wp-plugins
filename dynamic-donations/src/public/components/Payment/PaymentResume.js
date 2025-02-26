import React from 'react';
import styled from 'styled-components';
import { useSelector } from 'react-redux';

import { DONATIONS_MODES } from '../../share/constants';
import PaymentResumeText from './PaymentResumeText';
import { getFormattedDateRecurringDonation } from '../../utils/date';
import { capitalize } from '../../utils/string';

import LoadingSpinner from '../LoadingSpinner/LoadingSpinner';


const ResumeWrap = styled.div`
  background: #f6f8fa;
  border: 1px solid #d4e3fb;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 40px;
  margin-bottom: 30px;
  padding: 40px 20px 20px 20px;
  position: relative;
`;

const ResumeIcon = styled.span`
  position: absolute;
  top: -20px;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  background: #1A73E8;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff;
  font-size: 25px;
`;

const ResumeContent = styled.div`
  width: 100%;
`;

const ResumeGrid = styled.div`
  display: flex;
  flex-direction: column;
  margin: 16px 0;
  gap: 1rem;

  @media only screen and (min-width: 48em) {
    flex-direction: row;
    justify-content: center;
  }
`;

const ResumeGridItem = styled.div``;

const PaymentResume = () => {

  const {global} = useSelector((state) => ({
		global: state.global,
	}));
  
  const { donate } = useSelector((state) => state);
  const donateType = {
    onetime: 'One time',
    recurring: 'Recurring'
  }

  const getDonationModeLabel = (mode) => {
    const item = DONATIONS_MODES.find((item) => item.key === mode);
    return item.label;
  }

  return (
    <>
      {global.loader ? (<LoadingSpinner />) : ''}
      <ResumeWrap>
        <ResumeIcon>
          {donate.symbol}
        </ResumeIcon>
        <ResumeContent>
          <PaymentResumeText title="Donation Type:" paragraph={donateType[donate.type]} />
          <ResumeGrid>
            <ResumeGridItem>
              <PaymentResumeText
                title="Amount:"
                paragraph={`${donate.symbol} ${donate.amount}`}
                textAlign="center"
              />
            </ResumeGridItem>
            {
              donate.type === 'recurring' ?
                donate.recurringOptions.mode === 'custom'
                  ? (
                    <>
                      <ResumeGridItem>
                        <PaymentResumeText
                          title="Repeat donation:"
                          paragraph={`Every ${donate.recurringOptions.intervalCount} ${capitalize(donate.recurringOptions.interval)}s`}
                          textAlign="left"
                        />
                      </ResumeGridItem>
                    </>
                  )
                  : (
                    <>
                      <ResumeGridItem>
                        <PaymentResumeText
                          title="Repeat donation:"
                          paragraph={getDonationModeLabel(donate.recurringOptions.mode)}
                          textAlign="left"
                        />
                      </ResumeGridItem>
                    </>
                  )
                : null
            }
            <ResumeGridItem>
              {
                donate.type === 'recurring' && (
                  <PaymentResumeText
                    title="Next donation:"
                    paragraph={`Will be made ${getFormattedDateRecurringDonation(donate.recurringOptions.mode, donate.recurringOptions.interval, donate.recurringOptions.intervalCount, donate.recurringOptions.startDate)}`}
                    textAlign="left"
                  />
                )
              }
            </ResumeGridItem>
          </ResumeGrid>
        </ResumeContent>
      </ResumeWrap>
    </>

  );
}

export default PaymentResume;
