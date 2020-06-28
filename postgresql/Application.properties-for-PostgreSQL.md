# Server Configuration
server.port = 8093
spring.datasource.driver-class-name = org.postgresql.Driver
spring.datasource.url = jdbc:postgresql://localhost:5432/aplikasi_pelatihan
spring.datasource.username = postgres
spring.datasource.password = pejuang

#JPA Configuration
spring.jpa.show-sql = false
spring.jpa.database-platform= org.hibernate.dialect.PostgreSQLDialect
spring.jpa.properties.hibernate.temp.use_jdbc_metadata_defaults= false
spring.jpa.hibernate.ddl-auto= update

#Logging
logging.level.org.springframework= INFO
logging.level.org.hibernate= INFO

## Addition ##

#Web Security
spring.security.user.name = admin
spring.security.user.password = admin

# Liquibase
spring.liquibase.change-log = classpath:/db/changelog/db.changelog-master.xml

# Eureka
eureka.client.service-url.default-zone=http://localhost:8761/eureka/
eureka.instance.lease-renewal-interval-in-seconds= 30
eureka.instance.lease-expiration-duration-in-seconds= 90

#load balancing
ribbon.eureka.enabled= true
