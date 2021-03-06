CREATE TABLE "JOBS_CRITICOS"."JOBS" (
		"nombre_job" VARCHAR(500) NOT NULL
	)
	DATA CAPTURE NONE
	IN "USERSPACE001"
	COMPRESS NO;

ALTER TABLE "JOBS_CRITICOS"."JOBS" ADD CONSTRAINT "SQL170622094335740" PRIMARY KEY
	("nombre_job");

GRANT ALTER ON TABLE "JOBS_CRITICOS"."JOBS" TO USER "DB2ADMIN" WITH GRANT OPTION;

GRANT CONTROL ON TABLE "JOBS_CRITICOS"."JOBS" TO USER "DB2ADMIN";

GRANT DELETE ON TABLE "JOBS_CRITICOS"."JOBS" TO USER "DB2ADMIN" WITH GRANT OPTION;

GRANT INDEX ON TABLE "JOBS_CRITICOS"."JOBS" TO USER "DB2ADMIN" WITH GRANT OPTION;

GRANT INSERT ON TABLE "JOBS_CRITICOS"."JOBS" TO USER "DB2ADMIN" WITH GRANT OPTION;

GRANT REFERENCES ON TABLE "JOBS_CRITICOS"."JOBS" TO USER "DB2ADMIN" WITH GRANT OPTION;

GRANT SELECT ON TABLE "JOBS_CRITICOS"."JOBS" TO USER "DB2ADMIN" WITH GRANT OPTION;

GRANT UPDATE ON TABLE "JOBS_CRITICOS"."JOBS" TO USER "DB2ADMIN" WITH GRANT OPTION;


CREATE TABLE "JOBS_CRITICOS"."JOBS_DIA" (
		"nombre_job" VARCHAR(500) NOT NULL,
		"hora_job" INTEGER,
		"minuto_job" INTEGER
	)
	DATA CAPTURE NONE
	IN "USERSPACE001"
	COMPRESS NO;

ALTER TABLE "JOBS_CRITICOS"."JOBS_DIA" ADD CONSTRAINT "SQL170622130155460" PRIMARY KEY
	("nombre_job");
