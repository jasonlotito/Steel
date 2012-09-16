<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="xml" version="5.0" encoding="utf-8" indent="yes"
              standalone="yes" omit-xml-declaration="yes"/>

  <xsl:include href="Form/InputText.xsl" />
  <xsl:include href="Form/TextArea.xsl" />

  <xsl:template match="/Form">
    <form>

      <xsl:for-each select="elements/elements">
        <xsl:choose>
          <xsl:when test="type = 'InputText'">
            <xsl:call-template name="InputText">
              <xsl:with-param name="value">
                <xsl:value-of select="value"/>
              </xsl:with-param>
              <xsl:with-param name="label">
                <xsl:value-of select="label"/>
              </xsl:with-param>
              <xsl:with-param name="name">
                <xsl:value-of select="name"/>
              </xsl:with-param>
              <xsl:with-param name="placeholder">
                <xsl:value-of select="placeholder"/>
              </xsl:with-param>
            </xsl:call-template>
          </xsl:when>
          <xsl:when test="type = 'TextArea'">
            <xsl:call-template name="TextArea">
              <xsl:with-param name="value"><xsl:value-of select="value"/></xsl:with-param>
            </xsl:call-template>
          </xsl:when>
        </xsl:choose>
      </xsl:for-each>

    </form>
  </xsl:template>

</xsl:stylesheet>
