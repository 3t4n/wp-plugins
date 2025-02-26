/* tslint:disable:no-unused-expression no-empty */
import * as chai from 'chai';
import {expect} from 'chai';
import {of, Subject} from 'rxjs';
import {controlStream, onSubscribe} from './control-stream';

describe('Control stream', () => {
    it('should be called on subscribe', () => {
        const spy = chai.spy();
        of(true).pipe(onSubscribe(spy)).subscribe();
        expect(spy).called;
    });

    it('stream should be controlled', () => {
        const source = new Subject<number>();
        const suspend = new Subject();
        const resume = new Subject();

        const result: number[] = [];
        source.pipe(controlStream(suspend, resume)).subscribe(value => {
            result.push(value);
        });

        // Should be emitted
        source.next(0);
        expect(result).eql([0]);
        suspend.next();
        // Should be buffered
        source.next(1);
        source.next(2);
        expect(result).eql([0]);

        // Should support nesting
        suspend.next();
        resume.next();
        resume.next();

        expect(result).eql([0, 1, 2]);
        source.next(3);
        expect(result).eql([0, 1, 2, 3]);
    });

    it('should propagate error', () => {
        const source = new Subject<number>();
        const suspend = new Subject();
        const resume = new Subject();

        const errorSpy = chai.spy();
        const sub = source.pipe(controlStream(suspend, resume)).subscribe(value => {}, errorSpy);

        source.error({});
        expect(errorSpy).called;
        sub.unsubscribe();
    });

    it('should propagate complete', () => {
        const source = new Subject<number>();
        const suspend = new Subject();
        const resume = new Subject();

        const completeSpy = chai.spy();
        const sub = source.pipe(controlStream(suspend, resume)).subscribe(value => {}, () => {}, completeSpy);

        source.complete();
        expect(completeSpy).called;
        sub.unsubscribe();
    });
});
